<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MLP To-Do</title>

    <link rel="icon" type="image/x-icon" href="favicon.ico">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300&display=swap" rel="stylesheet">
    @vite('resources/css/app.css')
</head>
<body>
    <header class="container">
        <div class="row">
            <div class="col-md-12">
                <img src="{{ asset('images/logo.png') }}" alt="MLP Logo" class="img-responsive">
            </div>
        </div>
    </header>
    <main>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <input type="text" class="form-control" placeholder="Insert task name">
                    <button class="submit-btn btn btn-primary btn-block">Add</button>
                </div>
                <div class="col-md-8">
                    <div class="container-fluid bg-white task-list-container">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Task</th>
                                            <th><span class="sr-only">Actions</span></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer class="container">
        <div class="row">
            <div class="text-center">
                Copyright &copy; 2020 All Rights Reserved
            </div>
        </div>
    </footer>

    @vite('resources/js/app.js')
</body>
</html>
