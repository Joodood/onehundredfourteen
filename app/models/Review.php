<?php

class Review {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    // Get all institution reviews for a user
    public function getUserInstitutionReviews($user_id) {
        $this->db->query('SELECT ir.*, i.institution_name, i.institution_city, i.institution_state 
                         FROM institutions_reviews ir
                         INNER JOIN institutions i ON ir.institution_id = i.institution_id
                         WHERE ir.user_id = :user_id
                         ORDER BY ir.created_at DESC');
        $this->db->bind(':user_id', $user_id, PDO::PARAM_INT);
        return $this->db->resultSet();
    }

    // Get all receptionist reviews for a user
    public function getUserReceptionistReviews($user_id) {
        $this->db->query('SELECT rr.*, r.receptionist_name, i.institution_name 
                         FROM receptionists_reviews rr
                         INNER JOIN receptionists r ON rr.receptionist_id = r.receptionist_id
                         LEFT JOIN institutions i ON r.institution_id = i.institution_id
                         WHERE rr.user_id = :user_id
                         ORDER BY rr.created_at DESC');
        $this->db->bind(':user_id', $user_id, PDO::PARAM_INT);
        return $this->db->resultSet();
    }

    // Add or Update institution review (UPSERT)
    public function upsertInstitutionReview($institution_id, $user_id, $comment, $stars) {
        // Check if user already reviewed this institution
        $this->db->query('SELECT review_id FROM institutions_reviews 
                     WHERE institution_id = :institution_id AND user_id = :user_id');
        $this->db->bind(':institution_id', $institution_id, PDO::PARAM_INT);
        $this->db->bind(':user_id', $user_id, PDO::PARAM_INT);
        $existing = $this->db->single();

        if($existing) {
            // UPDATE existing review
            $this->db->query('UPDATE institutions_reviews 
                         SET institution_comment = :comment, 
                             stars = :stars,
                             created_at = :created_at
                         WHERE review_id = :review_id');
            $this->db->bind(':comment', $comment, PDO::PARAM_STR);
            $this->db->bind(':stars', $stars, PDO::PARAM_INT);
            $this->db->bind(':created_at', date('F d, Y, h:i:s a'), PDO::PARAM_STR);

            // IMPORTANT: Make sure we're using the review_id correctly
            $review_id = is_array($existing) ? $existing['review_id'] : $existing->review_id;
            $this->db->bind(':review_id', $review_id, PDO::PARAM_INT);
        } else {
            // INSERT new review
            $this->db->query('INSERT INTO institutions_reviews 
                         (institution_id, user_id, institution_comment, stars, created_at) 
                         VALUES (:institution_id, :user_id, :comment, :stars, :created_at)');
            $this->db->bind(':institution_id', $institution_id, PDO::PARAM_INT);
            $this->db->bind(':user_id', $user_id, PDO::PARAM_INT);
            $this->db->bind(':comment', $comment, PDO::PARAM_STR);
            $this->db->bind(':stars', $stars, PDO::PARAM_INT);
            $this->db->bind(':created_at', date('F d, Y, h:i:s a'), PDO::PARAM_STR);
        }

        if($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function upsertReceptionistReview($receptionist_id, $user_id, $comment, $stars) {
        // Check if user already reviewed this receptionist
        $this->db->query('SELECT review_id FROM receptionists_reviews 
                     WHERE receptionist_id = :receptionist_id AND user_id = :user_id');
        $this->db->bind(':receptionist_id', $receptionist_id, PDO::PARAM_INT);
        $this->db->bind(':user_id', $user_id, PDO::PARAM_INT);
        $existing = $this->db->single();

        if($existing) {
            // UPDATE existing review
            $this->db->query('UPDATE receptionists_reviews 
                         SET receptionist_comment = :comment, 
                             stars = :stars,
                             created_at = :created_at
                         WHERE review_id = :review_id');
            $this->db->bind(':comment', $comment, PDO::PARAM_STR);
            $this->db->bind(':stars', $stars, PDO::PARAM_INT);
            $this->db->bind(':created_at', date('F d, Y, h:i:s a'), PDO::PARAM_STR);

            // IMPORTANT: Make sure we're using the review_id correctly
            $review_id = is_array($existing) ? $existing['review_id'] : $existing->review_id;
            $this->db->bind(':review_id', $review_id, PDO::PARAM_INT);
        } else {
            // INSERT new review
            $this->db->query('INSERT INTO receptionists_reviews 
                         (receptionist_id, user_id, receptionist_comment, stars, created_at) 
                         VALUES (:receptionist_id, :user_id, :comment, :stars, :created_at)');
            $this->db->bind(':receptionist_id', $receptionist_id, PDO::PARAM_INT);
            $this->db->bind(':user_id', $user_id, PDO::PARAM_INT);
            $this->db->bind(':comment', $comment, PDO::PARAM_STR);
            $this->db->bind(':stars', $stars, PDO::PARAM_INT);
            $this->db->bind(':created_at', date('F d, Y, h:i:s a'), PDO::PARAM_STR);
        }

        if($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Get average rating for an institution
    public function getInstitutionAverageRating($institution_id) {
        $this->db->query('SELECT AVG(stars) as avg_rating, COUNT(*) as review_count 
                         FROM institutions_reviews 
                         WHERE institution_id = :institution_id');
        $this->db->bind(':institution_id', $institution_id, PDO::PARAM_INT);
        return $this->db->single();
    }

    // Get average rating for a receptionist
    public function getReceptionistAverageRating($receptionist_id) {
        $this->db->query('SELECT AVG(stars) as avg_rating, COUNT(*) as review_count 
                         FROM receptionists_reviews 
                         WHERE receptionist_id = :receptionist_id');
        $this->db->bind(':receptionist_id', $receptionist_id, PDO::PARAM_INT);
        return $this->db->single();
    }

    // Delete institution review
    public function deleteInstitutionReview($review_id) {
        $this->db->query('DELETE FROM institutions_reviews WHERE review_id = :review_id');
        $this->db->bind(':review_id', $review_id, PDO::PARAM_INT);
        
        if($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Delete receptionist review
    public function deleteReceptionistReview($review_id) {
        $this->db->query('DELETE FROM receptionists_reviews WHERE review_id = :review_id');
        $this->db->bind(':review_id', $review_id, PDO::PARAM_INT);
        
        if($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Verify institution review ownership
    public function verifyInstitutionReviewOwnership($review_id, $user_id) {
        $this->db->query('SELECT * FROM institutions_reviews 
                         WHERE review_id = :review_id AND user_id = :user_id');
        $this->db->bind(':review_id', $review_id, PDO::PARAM_INT);
        $this->db->bind(':user_id', $user_id, PDO::PARAM_INT);
        
        $row = $this->db->single();
        
        if($row) {
            return true;
        } else {
            return false;
        }
    }

    // Verify receptionist review ownership
    public function verifyReceptionistReviewOwnership($review_id, $user_id) {
        $this->db->query('SELECT * FROM receptionists_reviews 
                         WHERE review_id = :review_id AND user_id = :user_id');
        $this->db->bind(':review_id', $review_id, PDO::PARAM_INT);
        $this->db->bind(':user_id', $user_id, PDO::PARAM_INT);
        
        $row = $this->db->single();
        
        if($row) {
            return true;
        } else {
            return false;
        }
    }

    // Check if user has already reviewed an institution
    public function hasUserReviewedInstitution($institution_id, $user_id) {
        $this->db->query('SELECT * FROM institutions_reviews 
                         WHERE institution_id = :institution_id AND user_id = :user_id');
        $this->db->bind(':institution_id', $institution_id, PDO::PARAM_INT);
        $this->db->bind(':user_id', $user_id, PDO::PARAM_INT);
        
        $row = $this->db->single();
        return $row ? $row : false;
    }

    // Check if user has already reviewed a receptionist
    public function hasUserReviewedReceptionist($receptionist_id, $user_id) {
        $this->db->query('SELECT * FROM receptionists_reviews 
                         WHERE receptionist_id = :receptionist_id AND user_id = :user_id');
        $this->db->bind(':receptionist_id', $receptionist_id, PDO::PARAM_INT);
        $this->db->bind(':user_id', $user_id, PDO::PARAM_INT);
        
        $row = $this->db->single();
        return $row ? $row : false;
    }

    // Get all reviews for a receptionist with user info
    public function getReceptionistReviews($receptionist_id) {
        $this->db->query('SELECT rr.*, u.email 
                     FROM receptionists_reviews rr 
                     LEFT JOIN users u ON rr.user_id = u.id 
                     WHERE rr.receptionist_id = :receptionist_id 
                     ORDER BY rr.created_at DESC');
        $this->db->bind(':receptionist_id', $receptionist_id, PDO::PARAM_INT);
        return $this->db->resultSet();
    }

}
