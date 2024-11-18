<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Expense Tracker</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

        <!-- Styles -->
        <style>
            body {
                font-family: 'Nunito', sans-serif;
                margin: 0;
                display: flex;
                justify-content: center;
                align-items: center;
                min-height: 100vh;
                background-color: #f7fafc;
            }

            .container {
                text-align: center;
                width: 80%;
                max-width: 600px;
                margin: auto;
            }

            h1 {
                font-size: 40px;
                font-weight: 700;
                margin-bottom: 30px;
                color: #2d3748;
            }

            .btn, .btnlogin {
                padding: 12px 24px;
                font-size: 40px;
                font-weight: 600;
                color: white;
                border: none;
                border-radius: 8px;
                cursor: pointer;
                margin: 5px;
                text-decoration: none;
                width: 100%;
                max-width: 200px;
                box-sizing: border-box;
            }

            .btn {
                background-color: #00308F;
            }

            .btn:hover {
                background-color: #007FFF;
            }

            .btnlogin {
                background-color: #008000;
            }

            .btnlogin:hover {
                background-color: #03C03C;
            }

            /* Media query for smaller devices (e.g., mobile) */
            @media (max-width: 600px) {
                h1 {
                    font-size: 40px;
                }

                .btn, .btnlogin {
                    font-size: 40px;
                    padding: 10px 20px;
                }

                .icon-container i {
                    font-size: 12vw;
                }
                body{
                    display: grid;
                    align-items: center;
                    justify-content: center;
                }
                .container{
                    display: grid;
                    align-items: center;
                    justify-content: center;
                }
            }
        </style>
    </head>
    <body class="antialiased">
        <div class="container">
            <div class="icon-container">
                <i class="fa fa-line-chart" style="font-size:70px;color:Red;"></i>
            </div>
            <h1>TRIO POS</h1>
            <a href="/cashier/login" class="btnlogin">Login</a>
            <a href="/cashier/register" class="btn">Sign Up</a>
        </div>
    </body>
</html>
