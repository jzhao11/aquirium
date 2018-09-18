var header = document.getElementsByTagName('header')[0],
    navLi = header.getElementsByTagName('li'),
    pName = header.getElementsByTagName('p')[0],
    strong = header.getElementsByTagName('strong')[0],
    home = document.getElementById('home'),
    origin = document.getElementById('origin'),
    originLi = origin.getElementsByTagName('ul')[0].getElementsByTagName('li'),
    svs = document.getElementById('svs'),
    ecn = document.getElementById('ecn'),
    xm = document.getElementById('xm'),
    strategy = document.getElementById('strategy'),
    news = document.getElementById('news'),
    trading = document.getElementById('trading'),
    originNode = [svs, ecn, xm],
    arrNode = [home, origin, strategy, news, trading];

function changeTab(obj, tarobj) {
    for (var i=0; i<obj.length; i++) {
        obj[i].index = i;
        obj[i].addEventListener('click', function () {
            for (var i=0; i<obj.length; i++) {
                obj[i].className = '';
                tarobj[i].style.display = 'none';
            }
            this.className = 'liActive';
            tarobj[this.index].style.display = 'block';
        });
    }
}

changeTab(navLi, arrNode);
changeTab(originLi, originNode);

pName.addEventListener('click', function () {
    this.style.left = '-100px';
    setTimeout(function () {
        pName.style.left = '0';
    }, 3000)
});
