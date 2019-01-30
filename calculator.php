<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS"
        crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-6">
                <div class="card mt-5">
                    <div class="card-header">
                        <h3>Calculator</h3>
                    </div>
                    <div class="card-body">
                        <form method="post">
                            <div class="form-group">
                            <input type="number" name="num1" class="form-control">
                            </div>
                            <div class="form-group">
                                <select name="operator" id="" class="form-control">
                                    <option value="+">+</option>
                                    <option value="-">-</option>
                                    <option value="*">*</option>
                                    <option value="/">/</option>
                                </select>
                            </div>
                            <div class="form-group">
                            <input type="number" name="num2" class="form-control">
                            </div>
                            <button type="submit" name="submit" class='btn btn-block btn-sm btn-primary'>Calculate</button>
                            <button type="reset" class='btn btn-block btn-sm btn-outline-dark'>Reset</button>
                        </form>
                        <hr>
                        <?php
                            require 'Calculate.php';

                            $calc = new Calculate;
                            if(isset($_POST['submit'])){
                                $num1 = $_POST['num1'];
                                $operator = $_POST['operator'];
                                $num2 = $_POST['num2'];
                                $total = $calc->solve($num1, $num2, $operator);
                                echo "<p>Answer: " . $total . "</p>";


                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut"
    crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k"
    crossorigin="anonymous"></script>
</html>