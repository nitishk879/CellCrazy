import React, {Component} from 'react';
import axios from 'axios';
import ReactDOM from 'react-dom';

class Notification extends Component{
    constructor() {
        super();
        this.state ={
            notifications: []
        }
        this.markAsReadNotification = this.markAsReadNotification.bind(this)
        // this.removeNotification = this.removeNotification.bind(this)
    }

    markAsReadNotification (notificationId) {
        axios.put(`/api/notifications/${notificationId}`).then(response => {
            this.setState(prevState => ({
                notifications: prevState.notifications.filter(notification => {
                    return notification.id !== notificationId
                })
            }))
        })
    }

    // removeNotification (notificationId) {
    //     axios.delete(`/api/notifications/${notificationId}`).then(response => {
    //         this.setState(prevState => ({
    //             notifications: prevState.notifications.filter(notification => {
    //                 return notification.id !== notificationId
    //             })
    //         }))
    //     })
    // }
    componentDidMount () {
        axios.get('/api/notifications').then(response => {
            this.setState({
                notifications: response.data
            })
        })
    }

    render() {
        const {notifications} = this.state
        return (
            <div className="container">
                <div className="row justify-content-center">
                    <div className="col-md-8">
                        <div className="card">
                            <div className="card-header">Notifications {notifications.count}</div>
                            <ul className="list-group">
                                { notifications.map(notification =>(
                                    <li className="list-group-item d-flex justify-content-between align-items-center" key={notification.id}>
                                        { notification.data.name }
                                        <a href={"#"} className="badge badge-primary badge-pill" onClick={this.markAsReadNotification.bind(this,notification.id)}>Read</a>
                                        {/*<a href={"#"} className="badge badge-danger badge-pill" onClick={this.removeNotification.bind(this,notification.id)}>X</a>*/}
                                    </li>
                                ))}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        );
    }
}

export default Notification;

if (document.getElementById('notifications')) {
    ReactDOM.render(<Notification />, document.getElementById('notifications'));
}
