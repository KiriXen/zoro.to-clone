var film_list_wrap = document.getElementById("recentRelease");

document.addEventListener("DOMContentLoaded", ()=>{
    
    fetchUrl = 'http://api1.otakuu.me/recent-release?type=1'
    async function recentRelease(url){
        const response = await fetch(url);
        var data = await response.json();
        //console.log(data)
        let htmlText = "";
        data.forEach((item) => {
            htmlText += `
                        <div class="flw-item ">
                            <div class="film-poster">
                                <div class="tick ltr">
                                    <div class="tick-item-sub  tick-eps amp-algn">${item.subOrDub}</div>
                                </div>
                                <div class="tick rtl">
                                    <div class="tick-item tick-eps amp-algn">Episode ${item.episodeNum}
                                    </div>
                                </div>
                                <img class="film-poster-img lazyload"
                                    data-src="${item.imgUrl}"
                                    src="../images/no_poster.jpg"
                                    alt="${item.name}">
                                <a class="film-poster-ahref"
                                    href="/watch/${item.episodeId}"
                                    title="${item.name}"
                                    data-jname="${item.name}"><i class="fas fa-play"></i></a>
                            </div>
                            <div class="film-detail">
                                <h3 class="film-name">
                                    <a
                                        href="/watch/${item.episodeId}"
                                        title="${item.name}"
                                        data-jname="${item.name}">${item.name}</a>
                                </h3>
                                <div class="fd-infor">
                                    <span class="fdi-item">${item.subOrDub}</span>
                                    <span class="dot"></span>
                                    <span class="fdi-item">Latest</span>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>`
        
        })
    
        film_list_wrap.innerHTML = htmlText
        //console.log(htmlText)
    }
    
    recentRelease(fetchUrl)
});