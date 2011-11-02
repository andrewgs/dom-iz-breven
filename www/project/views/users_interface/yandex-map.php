<script type="text/javascript">
var map, stations = [{point: new YMaps.GeoPoint(39.615393,47.236995), name:"Компания Зеленый Дом"}];
    YMaps.jQuery(function () {
        map = new YMaps.Map(YMaps.jQuery("#YMapsID")[0]);
        map.setCenter(new YMaps.GeoPoint(39.617393,47.235586), 15);
        map.addControl(new YMaps.Zoom());
        map.enableScrollZoom();
        var s = new YMaps.Style();
        s.iconStyle = new YMaps.IconStyle();
        s.iconStyle.href = "<?=$baseurl;?>img/home_contacts.png";
        s.iconStyle.size = new YMaps.Point(45, 50);
        s.iconStyle.offset = new YMaps.Point(60, 50);
        map.addOverlay(createOverlay(stations[0]));
    });
    function createOverlay (station)  {
        var link = YMaps.jQuery("<a href=\"#\">" + station.name + "</a>"), // Создание ссылки
            newOverlay = new SimpleOverlay(station.point, station.name, link); // Создание оверлея
        link
            .bind("click", function () {
                if (link.hasClass("active")) return;
                newOverlay.openBalloon();
                return false;
            })
            .appendTo(YMaps.jQuery("#links"))
        return newOverlay;
    }
    function SimpleOverlay (geoPoint, name, link) {
        var map, _this = this, offset = new YMaps.Point(-10,-29);
        this.onAddToMap = function (pMap, parentContainer) {
            map = pMap;
            getElement().appendTo(parentContainer);
            this.onMapUpdate();
        };
        this.onRemoveFromMap = function () {
            if (getElement().parent()) {
                getElement().remove();
            }
        };
        this.onMapUpdate = function () {
            var position = map.converter.coordinatesToMapPixels(geoPoint).moveBy(offset);
            getElement().css({
                left : position.x,
                top :  position.y
            })
        };
        this.openBalloon = function () {
            link.addClass("active");
            getElement().css("display", "none");
            map.openBalloon(geoPoint, name,{onClose: function () {
                link.removeClass("active");
                getElement().css("display", "");
            }});
        };
        function getElement () {
            var element = YMaps.jQuery("<div class=\"overlay\"/>");
            element.css("z-index", YMaps.ZIndex.Overlay);
            element.bind("click", function () {
                _this.openBalloon();
            });
            return (getElement = function () {return element})();
        }
}
</script>
<div class="map-wrapper">
	<div id="YMapsID" style="width: 600px; height: 400px;"></div>
</div>