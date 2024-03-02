var allSideMenu = document.querySelectorAll('#sidebar .side-menu.top li a');

allSideMenu.forEach(item=> {
    const li = item.parentElement;

    item.addEventListener('click', function () {
        allSideMenu.forEach(i=> {
            i.parentElement.classList.remove('active');
        })
        li.classList.add('active');
    })
});




// TOGGLE SIDEBAR
var menuBar = document.querySelector('#content nav .bx.bx-menu');
var sidebar = document.getElementById('sidebar');

menuBar.addEventListener('click', function () {
    sidebar.classList.toggle('hide');
})












//was uncommented
// function search() {
//     var inputValue = $('#live_search').val();

//     // Make AJAX request only if the input is not empty
//     if (inputValue !== '') {
//         $.ajax({
//             type: 'POST',
//             url: 'search',
//             data: { input: inputValue },
//             cache: false, // Prevents caching of the request
//             beforeSend: function() {
//                 $('#searchresult').empty(); // Clear the content before new data is loaded
//             },
//             success: function(response) {
//                 $('#searchresult').html(response);
//                 console.log(response);
//             },
//             error: function(xhr, status, error) {
//                 console.log("Error: " + error);
//                 console.log(xhr.responseText);
//             }
//         });
//     } else {
//         // Optionally clear the search results if the input is empty
//         $('#searchresult').empty();
//     }
// }

// $('#live_search').on('input', function() {
//     search(); // Call the search function whenever the input value changes
// });



        // Initial search on page load
        // search();
  




/////////both added whiuch were on institutionview page//////////
    window.addEventListener('load', (event) => {
    var sidebar = document.getElementById('sidebar');
    sidebar.classList.toggle('hide');
    console.log('The page has fully loaded');
});

//     menuBar.addEventListener('click', function () {
//     sidebar.classList.toggle('hide');
// })
////////////////////////////////////////////////////


//was uncommented
// $(document).ready(function() {

//     // Function to handle the search, including empty inputs
//     function searchrec() { // Changed function name here
//         var inputValue = $('#live_search').val();
//         console.log('Search triggered for:', inputValue); // Debugging log

//         // Make AJAX request
//         $.ajax({
//             type: 'POST',
//             url: 'searchrec', // This remains the same as it's the endpoint, not the function name
//             data: { input: inputValue },
//             cache: false, // Prevents caching of the request
//             beforeSend: function() {
//                 $('#searchresult').empty(); // Clear the content before new data is loaded
//                 console.log('Before sending AJAX request'); // Debugging log
//             },
//             success: function(response) {
//                 $('#searchresult').html(response);
//                 console.log('AJAX call successful, response:', response); // Debugging log
//             },
//             error: function(xhr, status, error) {
//                 console.error("AJAX error:", error);
//                 console.log("Status:", status, "Response:", xhr.responseText);
//             }
//         });
//     }

//     // Debounce function to prevent excessive AJAX calls
//     let debounceTimer;
//     $('#live_search').on('input', function() {
//         console.log('Input event triggered'); // Debugging log
//         clearTimeout(debounceTimer);
//         debounceTimer = setTimeout(function() {
//             searchrec(); // Changed function call here
//         }, 250); // Delay search to ensure user has finished typing
//     });

//     // Manual Test Update Button - for sanity check
//     $('<button/>', {
//         text: 'Test Update',
//         click: function() {
//             $('#searchresult').html('Manual test update successful');
//         }
//     }).appendTo('body');
// });




























// var searchButton = document.querySelector('#content nav form .form-input button');
// var searchButtonIcon = document.querySelector('#content nav form .form-input button .bx');
// var searchForm = document.querySelector('#content nav form');

// searchButton.addEventListener('click', function (e) {
//     if(window.innerWidth < 576) {
//         e.preventDefault();
//         searchForm.classList.toggle('show');
//         if(searchForm.classList.contains('show')) {
//             searchButtonIcon.classList.replace('bx-search', 'bx-x');
//         } else {
//             searchButtonIcon.classList.replace('bx-x', 'bx-search');
//         }
//     }
// })





// if(window.innerWidth < 768) {
//     sidebar.classList.add('hide');
// } else if(window.innerWidth > 576) {
//     searchButtonIcon.classList.replace('bx-x', 'bx-search');
//     searchForm.classList.remove('show');
// }


// window.addEventListener('resize', function () {
//     if(this.innerWidth > 576) {
//         searchButtonIcon.classList.replace('bx-x', 'bx-search');
//         searchForm.classList.remove('show');
//     }
// })



// const switchMode = document.getElementById('switch-mode');

// switchMode.addEventListener('change', function () {
//     if(this.checked) {
//         document.body.classList.add('dark');
//     } else {
//         document.body.classList.remove('dark');
//     }
// })