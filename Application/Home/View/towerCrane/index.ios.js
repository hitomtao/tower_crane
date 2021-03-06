import React, { Component } from 'react';
import {
    AppRegistry,
    StyleSheet,
    Text,
    View,
    Navigator,
} from 'react-native';
import indexPage from './ios_views/indexPage';
import loginPage from './ios_views/loginPage'
import SplashScreen from 'react-native-splash-screen'
export default class towerCrane extends Component {
    render() {
        let defaultName = '登录';
        let defaultComponent = indexPage;
        return (
            <Navigator
                initialRoute={{ name: defaultName, component: defaultComponent }}
                configureScene={(route) => {
                    if(route.component === loginPage){
                        return Navigator.SceneConfigs.FadeAndroid;
                    }
                        return Navigator.SceneConfigs.PushFromRight;
                }}
                renderScene={(route, navigator) => {
                    let Component = route.component;
                    return <Component {...route.params} navigator={navigator} />
                }} />
        );
    }

    componentDidMount() {
        SplashScreen.hide();//关闭启动屏幕
    }
}

AppRegistry.registerComponent('towerCrane', () => towerCrane);
