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