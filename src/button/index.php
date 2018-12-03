<template>
    <button>{{ text }}</button>
</template>

<style src="button.css" external></style>

<script>
    document.querySelector('.{{ sade_classname }}').addEventListener('click', function () {
        alert('Hello, Sade!');
    });
</script>

<?php

return [
    'scoped' => true,
    'data'   => [
        'text' => 'Submit',
    ],
];