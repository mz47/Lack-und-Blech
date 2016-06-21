<?php
    function switchStyle($sid) {
        switch($sid) {
            case 1: $color = "warning"; break;
            case 2: $color = "warning"; break;
            case 3: $color = "warning"; break;
            case 4: $color = "warning"; break;
            case 5: $color = "info"; break;
            case 6: $color = "info"; break;
            case 7: $color = "success"; break;
            case 99: $color = "danger"; break;
            default: $color = "info";
        }
        return $color;
    }

    function switchColor($sid) {
        switch($sid) {
            case 1: $color = "#f0ad4e"; break;
            case 2: $color = "#f0ad4e"; break;
            case 3: $color = "#f0ad4e"; break;
            case 4: $color = "#f0ad4e"; break;
            case 5: $color = "#5bc0de"; break;
            case 6: $color = "#5bc0de"; break;
            case 7: $color = "#5cb85c"; break;
            case 99: $color = "#d9534f"; break;
            default: $color = "5cb85c";
        }
        return $color;
    }
?>