$('<button>')
            .text('Click Me!')
            .appendTo('#main > div:last-child')
            .on('click', function(){
                var p = $('<p>').text('Javascript works as you\' expect!');
                $(this).replaceWith(p);
                p.hide().fadeIn();
            });