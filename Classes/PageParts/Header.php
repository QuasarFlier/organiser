<?php

namespace Classes\PageParts;

class Header {

    public function EchoMainHeader():void {

        $headerHtml = <<< HEADER
        <div class="header-container">
            <div class="header-element">
                <a href="../archive.php">
                    <button class="header-button">
                        Архив
                    </button>
                </a>
            </div>
            <div class="header-element">
                <a href="../index.php">
                    <button class="header-button">
                        Задачи
                    </button>
                </a>
            </div>
            <div class="header-element">
                <a href="../NewTask.php">
                    <button class="header-button">
                        Новая задача
                    </button>
                </a>
            </div>
        </div>
        HEADER;

        echo $headerHtml;
    }

}