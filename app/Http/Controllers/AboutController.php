<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function displayAbout(){
        return "<pre>" . "               o                                      o     
              <|>                                    <|>    
              / >                                    < >    
    o__ __o/  \o__ __o       o__ __o     o       o    |     
   /v     |    |     v\     /v     v\   <|>     <|>   o__/_ 
  />     / \  / \     <\   />       <\  < >     < >   |     
  \      \o/  \o/      /   \         /   |       |    |     
   o      |    |      o     o       o    o       o    o     
   <\__  / \  / \  __/>     <\__ __/>    <\__ __/>    <\__  
                                                            
                                                            
                                                            " . "</pre>";
    }
}
