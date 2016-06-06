@extends('layouts.app')

@section('content')



<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Click card to Flip, or Next to move on</div>

                    <div class="panel-body">                        
                
                        
                            
<!--                          Flascards  -->
                    <div class="row">
                        <div class="col-lg-3"></div>
                        <div c1ass="stage col-lg-6">
                          <div class="flashcard col-lg-6">
                            <div class="front">
                                                        
                              <p id="cardFront"></p>
                            </div>
                            <div class="back">
                              <p id="cardBack"></p>
                            </div>
                          </div>  
                        </div>
                        <div class="col-lg-3"></div>
                    </div>
                    <div class ="row">
                        <div class="row col-lg-12">

                            <button onclick="nextWord()">Next</button>                                          
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
