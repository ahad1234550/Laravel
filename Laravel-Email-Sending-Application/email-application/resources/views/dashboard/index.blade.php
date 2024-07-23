<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f9f9f9;
        }
        .container {
            max-width: 1200px;
            margin: 40px auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ddd;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .card {
            margin-bottom: 20px;
            border: none;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .card-header {
            background-color: #007bff;
            color: #fff;
            padding: 10px;
            border-bottom: 1px solid #ddd;
            border-radius: 5px 5px 0 0;
        }
        .card-body {
            padding: 20px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin: 10px 0 5px;
            font-weight: bold;
        }
        input, select, textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            padding: 10px 15px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        .errors p {
            color: red;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-center">Dashboard</h1>
        <br>
        @if(session('success'))
            <p class="alert alert-success">{{ session('success') }}</p>
        @endif
        <br>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Import Emails
                    </div>
                    <div class="card-body">
                        <form action="{{ route('dashboard.import') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="group">Group Name:</label>
                                <input type="text" name="group" id="group" required class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="file">Select File:</label>
                                <input type="file" name="file" id="file" required class="form-control">
                            </div>

                            <button type="submit" class="btn btn-primary">Import</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Send Emails
                    </div>
                    <div class="card-body">
                        <form action="{{ route('dashboard.send') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="group">Select Group:</label>
                                <select name="group" id="group" class="form-control">
                                    @foreach($userGroups as $userGroup)
                                        <option value="{{ $userGroup->id }}">{{ $userGroup->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="subject">Subject:</label>
                                <input type="text" name="subject" id="subject" required class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="body">Body:</label>
                                <textarea name="body" id="body" rows="5" required class="form-control"></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">Send</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <form action="{{ route('logout') }}" method="POST" style="margin-top: 20px;">
            @csrf
            <button type="submit" class="btn btn-secondary">Logout</button>
        </form>

    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>