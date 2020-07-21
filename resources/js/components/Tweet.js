import React from 'react';
import ReactDOM from 'react-dom';

class Tweet extends React.Component {
    constructor(props){
        super(props);
        this.state = {check: console.log('hi')};
    }

    componentDidMount() {

    }

    render() {
        return(
            <div>
                
            </div>
        );
    }
}

export default Tweet;

ReactDOM.render(<Tweet />, document.getElementById('tweet'));
