import React from 'react'
import ReactDOM from 'react-dom'

import  ButtonComponent from './ButtonComponent'
import "../../css/CoreComponent.css"


const CoreComponent = () =>{
    return (
        <div>
            <h1>
                Rest API, application
            </h1>

<p>
Application realized in <b><i>Laravel</i></b> and <b><i>React</i></b>, wich allows you to obtain values ​​from a REST API on an online host, the data is saved locally in the MySQL db and then shown through a simple UI provided by the Laravel Blade layout engine.
</p>

<p>
The db can be reset using the appropriate key, which will invoke the fresh migrate of the db tables history through Eloquent. 
</p>

<p>
The data shown in the user interface comes from the local database tables and is displayed through One to One relationships.
</p>

            <div className='controlPannel container mt-5'>
                    

                <div className='text-center' >

                    <div className="">
                        <ButtonComponent />
                    </div>
                </div>

            </div>
        </div>
    )
}

ReactDOM.render(<CoreComponent></CoreComponent>, document.getElementById("root"))

export default CoreComponent