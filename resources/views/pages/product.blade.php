<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>
@extends('pages.parts.master')

@section('content')

<h1>Lifting Gear Hire Media Library</h1>

{!! Form::open(array('url'=>'#')) !!}
<div class="form-group">
    {!! Form::label('sectionName','Section Name:') !!}
    {!! Form::text('sectionName',null,['class'=>'form-control']) !!}
    
</div>
<div class="form-group">
    {!! Form::select('sectionHide', array('hide' => 'Hide','notHide' => 'Show'),['class'=>'form-control']) !!}
   
    
</div>

    
{!! Form::close() !!}


@endsection

 