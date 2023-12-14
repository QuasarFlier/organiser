<?php

namespace Classes\PageParts;

class NewTask {

    public function EchoNewTask():void {

        $newTaskHtml = <<< NEW_TASK
        <div>
            <div class="header-element">
                <a>
                    <button class="header-button">
                        Новая задача
                    </button>
                </a>
            </div>
        </div>
        NEW_TASK;

        echo $newTaskHtml;
    }

}