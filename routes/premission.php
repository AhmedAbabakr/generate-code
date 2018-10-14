<?php

Blade::if('sales',function(){
	return auth()->user()->job_title === 'sales'?true:false;
});
Blade::if('technical',function(){
	return auth()->user()->job_title === 'technical'?true:false;
});
