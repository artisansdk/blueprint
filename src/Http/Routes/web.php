<?php

Route::get(config('blueprints.route'), config('blueprints.action'))->as(config('blueprints.name'));
