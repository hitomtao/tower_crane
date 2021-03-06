<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="content-language" content="zh-CN" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no, width=device-width">
    <meta name="screen-orientation" content="portrait">
    <meta name="x5-orientation" content="portrait">
    <meta name="full-screen" content="yes">
    <meta name="x5-fullscreen" content="true">
    <meta name="browsermode" content="application">
    <meta name="x5-page-mode" content="app">
    <meta name="msapplication-tap-highlight" content="no">
    <title>设备详情</title>
    <style>
        html,body {
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%;
        }
        #container {
            width: 100%;
            height: 100%;
        }
        /*版权声明*/
        .amap-copyright {
            display: none!important;
        }
        /*地图标尺和logo*/
        .amap-logo,
        .amap-scalecontrol {
            margin-left: 10px;
            margin-bottom: 10px;
        }
        .amap-zoomcontrol {
            margin-bottom: -15px;
        }
        /*定位图标*/
        .amap-geolocation-con {
            position: absolute;
            bottom: 25px!important;
            left: 20px;
        }
        /*地图类型切换*/
        .amap-maptype-con {
            height: 0;
            border: 0;
        }
        .amap-maptype-title {
            position: absolute;
            top: 15px;
            border-radius: 2px;
            background: rgba(255,255,255,0.8);
        }
        .amap-maptype-win {
            display: none!important;
        }
        .amap-maptype-list {
            display: none!important;
        }

    </style>
    <script type="text/javascript" src="http://webapi.amap.com/maps?v=1.3&key=2146690e2d145fe4563772453f916e42"></script>
</head>
<body>
<div id="container"></div>
<script>
    // 判断设备
    var isiPhone = navigator.userAgent.toLocaleLowerCase().match(/iPhone/i);
    // TODO：这里是后端取得的假数据,实际开发时需要替换为数据库数据
    var latitude = 112.92;
    var longitude = 27.90;
    // 实例化地图类
    var map = new AMap.Map('container',{
        resizeEnable: true,
        zoom: 17,
        center: [latitude,longitude],
    });
    //地图类型切换
    map.plugin(["AMap.MapType"],function(){
        var type= new AMap.MapType({
            defaultType:0
        });
        map.addControl(type);
    });
    // 设置地图样式
    map.setMapStyle("fresh");

    // 定位的圆
    var circle = new AMap.Circle({
        center: [latitude, longitude],
        radius: 50,
        fillOpacity:0.2,
        strokeWeight:2,
    })
    circle.setMap(map);

    //创建点标记
    var marker = new AMap.Marker({
        position: [latitude, longitude],
        map:map
    });
    //添加控件
    AMap.plugin(['AMap.ToolBar','AMap.Scale'],function(){
        var toolBar = new AMap.ToolBar();
        var scale = new AMap.Scale();
        map.addControl(toolBar);
        map.addControl(scale);
    });
    // 清除高德地图官网的超连接
    document.querySelector('a.amap-logo').onclick = function(){
        return false;
    };
</script>
</body>
</html>