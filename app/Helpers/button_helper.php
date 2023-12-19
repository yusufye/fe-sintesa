<?php

function button_chart_export($target,$eport_div=false){
    echo '<div class="btn-group" role="group">';
        echo '<button type="button" class="btn btn-light dropdown-toggle btn-sm" data-bs-toggle="dropdown" aria-expanded="false"> EXPORT</button>';
        echo '<ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">';
        echo '<li><a class="dropdown-item button-export-chart" data-export-to="pdf" data-export-type="'.($eport_div?"table":"chart").'" data-export-target="'.$target.'" href="#">PDF</a></li>';
        echo '<li><a class="dropdown-item button-export-chart" data-export-to="png" data-export-type="'.($eport_div?"table":"chart").'" data-export-target="'.$target.'" href="#">PNG</a></li>';
        echo '</ul>';
    echo '</div>';
}