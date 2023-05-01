<?php

return [
	'required'   => ':attribute არ არის მითითებული!',
	'email'      => 'მიუთითე სწორი ელ-ფოსტა',
	'confirmed'  => 'პაროლები არ ემთხვევა ერთმანეთს!',
	'min'        => [
		'string'  => 'მინიმუმ 3 სიმბოლო',
	],
	'unique' => ':attribute უკვე არსებობს',

	'attributes' => [
		'username'              => 'მომხმარებლის სახელი',
		'email'                 => 'ელ-ფოსტა',
		'password'              => 'პაროლი',
		'password_confirmation' => 'პაროლი ხელმეორედ',
	],
];
