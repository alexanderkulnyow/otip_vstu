const nav = document.getElementById('site-navigation');
let topperdropdown1 = document.getElementById("dropdown-menu1");
let topperdropdown2 = document.getElementById("dropdown-menu2");
let topperdropdown3 = document.getElementById("dropdown-menu3");
let WWidht = window.innerWidth;

function mobile_menu() {
    if (WWidht <= 900) {
        nav.className='main-navigation-mobile px-2';
        topperdropdown1.classList.add("dropdown-menu");
        topperdropdown2.classList.add("dropdown-menu");
        topperdropdown3.classList.add("dropdown-menu");
        // console.log(nav.className);
    } else {
        nav.className='main-navigation px-5';
        topperdropdown1.classList.remove("dropdown-menu");
        topperdropdown2.classList.remove("dropdown-menu");
        topperdropdown3.classList.remove("dropdown-menu");
        // console.log(nav.className);
    }
}
mobile_menu();
window.addEventListener(`resize`, event => {
    mobile_menu();
    console.log(WWidht);
}, false);




(function () {
    var container, button, menu, links, i, len;
    burger = document.getElementById('burger');
    container = document.getElementById('site-navigation');
    if (!container) {
        return;
    }
    button = container.getElementsByTagName('button')[0];
    if ('undefined' === typeof button) {
        return;
    }
    menu = container.getElementsByTagName('ul')[0];
    if ('undefined' === typeof menu) {
        button.style.display = 'none';
        return;
    }
    menu.setAttribute('aria-expanded', 'false');
    if (-1 === menu.className.indexOf('nav-menu')) {
        menu.className += ' nav-menu';
    }
    button.onclick = function () {
        if (-1 !== container.className.indexOf('toggled')) {
            container.className = container.className.replace(' toggled', '');
            burger.className = burger.className.replace('dashicons-no', 'dashicons-menu-alt3');
            button.setAttribute('aria-expanded', 'false');
            menu.setAttribute('aria-expanded', 'false');
        } else {
            container.className += ' toggled';
            burger.className = burger.className.replace('dashicons-menu-alt3', 'dashicons-no');
            button.setAttribute('aria-expanded', 'true');
            menu.setAttribute('aria-expanded', 'true');
        }
    };
    links = menu.getElementsByTagName('a');
    for (i = 0, len = links.length; i < len; i++) {
        links[i].addEventListener('focus', toggleFocus, true);
        links[i].addEventListener('blur', toggleFocus, true);
    }

    function toggleFocus() {
        var self = this;
        while (-1 === self.className.indexOf('nav-menu')) {
            if ('li' === self.tagName.toLowerCase()) {
                if (-1 !== self.className.indexOf('focus')) {
                    self.className = self.className.replace(' focus', '');
                } else {
                    self.className += ' focus';
                }
            }
            self = self.parentElement;
        }
    }

    (function (container) {
        var touchStartFn, i,
            parentLink = container.querySelectorAll('.menu-item-has-children > a, .page_item_has_children > a');
        if ('ontouchstart' in window) {
            touchStartFn = function (e) {
                var menuItem = this.parentNode, i;
                if (!menuItem.classList.contains('focus')) {
                    e.preventDefault();
                    for (i = 0; i < menuItem.parentNode.children.length; ++i) {
                        if (menuItem === menuItem.parentNode.children[i]) {
                            continue;
                        }
                        menuItem.parentNode.children[i].classList.remove('focus');
                    }
                    menuItem.classList.add('focus');
                } else {
                    menuItem.classList.remove('focus');
                }
            };
            for (i = 0; i < parentLink.length; ++i) {
                parentLink[i].addEventListener('touchstart', touchStartFn, false);
            }
        }
    }(container));
})();
