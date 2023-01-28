    $('#editor').trumbowyg({
        btns: [
            ['strong', 'em'],
            ['foreColor', 'backColor'],
            ['historyUndo', 'historyRedo'],
            ['link']
        ],
       
        
    });

    function limitText(textarea, limit) {
        if (textarea.value.length > limit) {
            textarea.value = textarea.value.substring(0, limit);
            alert("Você atingiu o limite de caracteres");
        }
    }
    

    $('#editor2').trumbowyg({
        btns: [
            ['strong', 'em'],
            ['foreColor', 'backColor'],
            ['historyUndo', 'historyRedo'],
            ['link']
        ]
       
    });

    $('#editor3').trumbowyg({
        btns: [
            ['strong', 'em'],
            ['foreColor', 'backColor'],
            ['historyUndo', 'historyRedo'],
            ['link']
        ]
    });

    