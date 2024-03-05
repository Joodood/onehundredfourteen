<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background: #f4f4f4;
    }

    .container {
        width: 80%;
        margin: auto;
        overflow: hidden;
    }

    .rating-block {
        background: #fff;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        text-align: center;
        margin-top: 20px;
    }

    .rating-block h2 {
        margin: 0;
        padding: 0;
        color: #333;
    }

    .rating-number {
        font-size: 64px;
        font-weight: bold;
        color: #333;
        margin: 20px 0;
    }

    .rating-label {
        font-size: 18px;
        color: #888;
        text-transform: uppercase;
        margin-bottom: 5px;
    }

    .rating-category {
        display: inline-block;
        margin: 10px;
        text-align: center;
    }

    .rating-category span {
        display: block;
        font-size: 24px;
        font-weight: bold;
        color: #333;
    }

    .rating-category small {
        font-size: 14px;
        color: #888;
    }

    .button {
        display: inline-block;
        padding: 10px 20px;
        margin: 10px;
        border-radius: 5px;
        text-decoration: none;
        color: white;
        background: #007bff;
    }

    .button:hover {
        background: #0056b3;
    }

    .rating-overall {
        font-size: 14px;
        color: #888;
    }
</style>


<main>

<div class="container">
    <div class="rating-block">
        <h2>Harvard University</h2>
        <span class="rating-number">3.3</span>
        <span class="rating-overall">Overall Quality</span>

        <div class="rating-category">
            <span>3.3</span>
            <small>Reputation</small>
        </div>
        <div class="rating-category">
            <span>3.1</span>
            <small>Internet</small>
        </div>
        <!-- Add more categories as needed -->

        <a href="#" class="button">Rate this school</a>
        <a href="#" class="button">Compare this school</a>
    </div>
</div>
</main>



</section