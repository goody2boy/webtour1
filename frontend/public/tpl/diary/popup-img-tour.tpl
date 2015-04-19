<div id="overlay-pop" class="ovelay" style="display:none;"></div>
<div class="photo-popup" style="display:none;">
    <div class="pp-inner">
        <a class="pp-close" id="close-pop-btn"><i class="fa fa-times"></i></a>
        <div class="pp-left">
            <div class="pp-cell"><img src="<%=baseUrl + data.images[0].imageId%>" alt="photo"></div>
            <a class="pp-prev" href="#"></a>
            <a class="pp-next" href="#"></a>
        </div><!-- pp-left -->
        <div class="pp-right">
            <% console.log("tesst");%>
            <% console.log(data);%>
            <div class="pp-title"><%=data.title%></div>
            <div class="pp-desc">
                <%=data.description%>
            </div>
            <div class="pp-social">
                <ul>
                    <li>
                        <img src="">
                    </li>
                    <li>
                        <img src="">
                    </li>
                    <li>
                        <img src="">
                    </li>
                </ul>
            </div>
            <div class="pp-info">All rights reserved by <a href="#">www.vietnamdiscoverytour.com.vn</a></div>
        </div><!-- pp-right -->
    </div><!-- footer -->
</div>