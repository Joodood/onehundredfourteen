<style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body, html {
            font-family: var(--poppins), sans-serif;
            width: 100%;
            height: 100%;
            overflow-x: hidden;
        }

        :root {
            --poppins: 'Poppins', sans-serif;
            --lato: 'Lato', sans-serif;

            --light: #F9F9F9;
            --blue: #3C91E6;
            --light-blue: #CFE8FF;
            --grey: #eee;
            --dark-grey: #AAAAAA;
            --dark: #342E37;
            --red: #DB504A;
            --yellow: #FFCE26;
            --light-yellow: #FFF2C6;
            --orange: #FD7238;
            --light-orange: #FFE0D3;
        }

        .homepagebackgroundPic {
            background-image: linear-gradient(rgba(0, 0, 0, 0.527), rgba(0, 0, 0, 0.5)), url('your-image-url-here.jpg');
            background-size: cover;
            background-position: center;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .head-title h1 {
            color: #fff;
            font-size: 2.5rem;
            text-align: center;
            margin-bottom: 20px;
        }

        .search-container {
            background: var(--light);
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 100%;
            max-width: 400px;
        }

        .search-container input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid var(--dark-grey);
            border-radius: 4px;
        }

        .search-btn {
            background-color: var(--blue);
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }

        .search-btn:hover {
            background-color: darken(var(--blue), 10%);
        }

        @media (max-width: 768px) {
            .head-title h1 {
                font-size: 2rem;
            }
            .search-container {
                width: 90%;
            }
        }
    </style>
</head>
<body>

<div class="homepagebackgroundPic">
    <div class="search-container">
        <h1>Rate My Receptionist</h1>
        <form action="your-action-url" method="POST">
            <input type="text" id="live_search" placeholder="Search..." name="input_institution_name">
            <button type="submit" id="submit-btn" class="search-btn">Search</button>
        </form>
    </div>
</div>