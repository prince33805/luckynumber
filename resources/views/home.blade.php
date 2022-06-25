<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lucky Number</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
</head>
<body>
    <div class="container">
        <a href="/"><h1>L U C K Y <span> N U M B E R </span></h1><a>
        <div class="row">

            <div class="col1">
                <h2>Lottery</h2>

                @if($data->isEmpty())
                
                <div class="table">
                    <div class="first">
                        <div class="label">1st Prize</div>
                        <h1> ??? </h1>
                    </div>
                    
                    <div class="second">
                        <div class="label">2nd Prize</div>
                        <div class="box">
                            <h1>??? </h1>
                        </div>
                        <div class="box">
                            <h1> ???</h1>
                        </div>
                        <div class="box">
                            <h1> ???</h1>
                        </div>
                    </div>

                    <div class="side">
                        <div class="label">Side 1st Prize</div>
                        <div class="box">
                            <h1>??? </h1>
                        </div>
                        <div class="box">
                            <h1> ???</h1>
                        </div>
                    </div>
                    
                    <div class="twodigit">
                        <div class="label">Last 2 digit Prize</div>
                        <h1>??</h1>
                    </div>
                </div>

                @else
                
                        <div class="table">
                            <div class="first">
                                <div class="label">1st Prize</div>
                                <h1> {{$first->number}}</h1>
                            </div>
                            
                            <div class="second">
                                <div class="label">2nd Prize</div>
                                <div class="box">
                                    <h1>{{$second1->number}} </h1>
                                </div>
                                <div class="box">
                                    <h1> {{$second2->number}}</h1>
                                </div>
                                <div class="box">
                                    <h1> {{$second3->number}}</h1>
                                </div>
                            </div>

                            <div class="side">
                                <div class="label">Side 1st Prize</div>
                                <div class="box">
                                    <h1>{{$side1->number}} </h1>
                                </div>
                                <div class="box">
                                    <h1> {{$side2->number}}</h1>
                                </div>
                            </div>
                            
                            <div class="twodigit">
                                <div class="label">Last 2 digit Prize</div>
                                <h1>{{$twodigit->number}} </h1>
                            </div>
                        </div>

                @endif

                <div class="btn">
                    <a class="btn btn-warning" href={{route('reset')}}>RESET</a>
                    <a class="btn btn-success" href={{route('roll')}}>ROLL</a>    
                </div>
            </div>

            <div class="col2">
                <h3>Check Number Here</h3>
                <form style="width: 80%;" class="mx-auto" action="{{url('search')}}" method="GET">
                    <input class="form-control my-4" type="text" 
                    placeholder="Search" aria-label="Search" name="search" maxlength="3" 
                    pattern="[0-9]{3}" title="Please Enter Three Number Only">
                    <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
                </form>
                <h3>Your Number is</h3>
                @if($search=='0')
                    <h3>???</h3>
                @else
                    <h3>{{$searchText}}</h3>
                    <h3>{{$message}}</h3>
                    <h3>{{$message2}}</h3>
                    {{-- @if($searchText == $search->number)
                        <h5>You win</h5>
                    @else
                        <h5>You win nothing</h5>
                    @endif --}}
                @endif

            </div>
            
        </div>
                    
    </div>
    

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>