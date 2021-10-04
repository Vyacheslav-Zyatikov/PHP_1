<?php

function getGallery($path) {
    return $images = array_splice(scandir($path), 2);
}

