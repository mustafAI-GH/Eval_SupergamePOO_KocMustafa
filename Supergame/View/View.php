<?php

class View { 

    private ?string $buffer = '';

    //Method pour afficher le HEADER
    public function displayHeader():self{
        ob_start();
?>
        <!DOCTYPE html>
            <html lang="fr">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Supergame</title>
                <link rel="stylesheet" href="./public/src/css/style.css">
                <script src="./public/src/js/script.js" defer></script>
            </head>
            <body>
                <header>
                    
                </header>
<?php
        $this->buffer = ob_get_clean();
        return $this;
    }


    //Method pour afficher le FOOTER
    public function displayFooter():self{
        ob_start(); //Mise en mémoire tampon (buffer)
?>
            <footer>
               
            </footer>
        </body>
        </html>
<?php 
        $this->buffer = ob_get_clean(); //récupération le contenu du buffer et j'efface le buffer

        return $this;
    }

    public function getBuffer():?string{
        return $this->buffer;
    }

    public function setBuffer(string $newBuffer):self{
        $this->buffer = $newBuffer;
        return $this;
    }

    //Method d'affiche du contenu HTML
    public function display():void{
        echo $this->buffer;
    }
}

