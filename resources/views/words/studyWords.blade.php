@extends('layouts.app')

@section('content')



<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Click card to Flip, or Next to move on</div>

                    <div class="panel-body">                        
                
                        
                            
<!--                          Flascards  -->
                        <div c1ass="stage col-md-8">
                          <div class="flashcard col-md-8">
                            <div class="front col-md-8">
                                                        
                              <p id="cardFront"></p>
                            </div>
                            <div class="back col-md-8">
                              <p id="cardBack"></p>
                            </div>
                          </div>  
                        </div>
                        <div class="row col-md-8">

                            <button onclick="nextWord()">Next</button>                                                     
        
                        </div>

                </div>
            </div>
        </div>
    </div>
</div>


@endsection
