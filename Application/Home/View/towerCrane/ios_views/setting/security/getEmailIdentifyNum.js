import React, { Component } from 'react';
import {
    StyleSheet,
    Text,
    View,
    Image,
    TouchableOpacity,
    AlertIOS,
} from 'react-native';
import NavigationBar from '../../common/navBar';
import Identify from './identify'
import Util from '../../common/util'

export default class getEmailIdentifyNum extends Component {
    constructor(props){
        super(props);
        this.state = {
            identifyNum: null,
        };
    }

    render() {
        return (
            <View style={{flex:1}}>
                <NavigationBar
                    title={'安全验证'}
                    leftText={'返回'}
                    leftAction={ this._backToFront.bind(this) }
                />
                <View style={styles.container}>
                    <View style={styles.info}>
                        <Text style={styles.infoText}>为了保证你的账户安全,请验证身份。验证成功后进行下一步操作。</Text>
                    </View>
                    <View style={styles.email}>
                        <Text style={styles.emailText}>{this.props.encryptEmail}</Text>
                    </View>
                    <View style={styles.buttonContainer}>
                        <TouchableOpacity
                            onPress={this._getIdentifyNum.bind(this)}>
                                <View style={styles.button}>
                                    <Text style={styles.buttonText}>发送验证码</Text>
                                </View>
                        </TouchableOpacity>
                    </View>
                    <View style={styles.bottomInfo}>
                        <Text style={styles.bottomInfoText}>
                            验证身份遇到问题? 请联系18673241234 或者发送邮件到364567123@163.com 联系管理员。
                        </Text>
                    </View>
                </View>
            </View>
        );
    }

    _backToFront (){
        const { navigator } = this.props;
        if(navigator) {
            navigator.pop();
        }
    }

    _getIdentifyNum(){
        let that = this;
        let formData = new FormData();
        formData.append("email",this.props.email);
        formData.append("username",this.props.username);
        let url = "http://localhost:8888/tower_crane/index.php/Home/towerCrane/sendEmail";
        // 发送email地址和用户名,得到验证码
        Util.post(url, formData,
            function (responseJson) {
                if(responseJson.status === 0) {
                    AlertIOS.alert('发送失败！', responseJson.message, [{text: '确认'}]);
                }
                if(responseJson.status === 1) {
                    that.setState({
                        identifyNum : responseJson.data.identifyNum,
                    });
                    AlertIOS.alert('发送成功！', responseJson.message, [{text: '确认',onPress: ()=>{
                        // 跳转到验证页面
                        const { navigator } = that.props;
                        if(navigator) {
                            navigator.push({
                                name: '请输入验证码',
                                component: Identify,
                                params: {
                                    encryptEmail: that.props.encryptEmail,
                                    email: that.props.email,
                                    username: that.props.username,
                                    changeWhat: that.props.changeWhat,
                                }
                            })
                        }
                    },}]);

                }
            },
            function (err) {
                alert(err);
            });
    }
}

const styles = StyleSheet.create({
    container: {
        flex: 1,
        alignItems: 'center',
        marginLeft: 15,
        marginRight: 15,
        marginTop: 10,
        marginBottom: 10,
    },
    info: {
        flex: 1,
    },
    email: {
        flex: 1,
    },
    buttonContainer: {
        flex: 4,
    },
    bottomInfo: {
        flex: 1,
        justifyContent: 'flex-end',
    },
    infoText: {
        fontSize: 16,
        color: '#666',
        fontWeight: '300',
    },
    emailText: {
        textAlign: 'center',
        fontSize: 24,
        color: '#333',
    },
    button: {
        alignItems: 'center',
        justifyContent: 'center',
        height: 40,
        width: Util.size.width-30,
        backgroundColor: '#0095e9',
        borderRadius: 5,
    },
    buttonText: {
        color: '#fff',
        fontSize: 20,
        fontWeight: '400',
    },
    bottomInfoText: {
        fontSize: 12,
        color: '#888',
        textAlign: 'center',
    },
});

module.exports = getEmailIdentifyNum;