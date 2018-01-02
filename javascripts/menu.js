document.addEventListener('DOMContentLoaded', function() {
    document.querySelector('#nav-trigger').addEventListener('change', function(e) {
        if (this.checked)
            document.querySelector('body').classList.add('no-scroll');
        else
            document.querySelector('body').classList.remove('no-scroll');


    });

    document.querySelectorAll('nav dt').forEach(function(item) {
        item.addEventListener('click', function() {
            this.parentNode.querySelectorAll('dd').forEach(function(dd) {
                if (dd.classList.contains('visible'))
                    dd.classList.remove('visible');
                else
                    dd.classList.add('visible');
            });
        })
    })
})
