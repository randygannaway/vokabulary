@extends('layouts.app')

@section('content')



<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">                        
                
                        
                            
<!--                          Flascards  -->
                        <div c1lass="stage">
                          <div class="flashcard">
                            <div class="front">
                                                        
                              <p id="cardFront"></p>
                            </div>
                            <div class="back">
                              <p id="cardBack"></p>
                            </div>
                          </div>  
                        </div>
                        <div class="row">

                            <button onclick="nextWord()">Next</button>                                                     
        
                        </div>

                </div>
            </div>
        </div>
    </div>
</div>


@endsection
