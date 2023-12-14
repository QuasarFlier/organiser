<?php

namespace Classes\PageParts;

class NewTask {

    public function EchoNewTask():void {

        $newTaskHtml = <<< NEW_TASK
            <div class="task-container-item">
                <a href="../NewTask.php">
                    <button class="new-task-button">
                        Новая задача
                    </button>
                </a>
            </div>
        NEW_TASK;

        echo $newTaskHtml;
    }

}