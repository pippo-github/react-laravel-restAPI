import "../../css/ButtonComponent.css"

import propertyComponents from './data_prop_component'

import { useEffect, useState } from "react";



const fetchMyAPI = (url, functionSetter) =>{

    fetch(url)
            .then( res => res.json())
            .then( data => { functionSetter( JSON.stringify(data.Search)); /* console.log(data.Search) */ })
            
}

const DinamicComponent = (props) =>{
    
    const [fetchAllContent, setFetchAllContent] = useState([]);

    useEffect( () =>{

    })

    
    const {title, urlAPI} = props

    fetchMyAPI(urlAPI, setFetchAllContent)

    // const handleSubmit = (e) =>{
    //     e.preventDefault();

    //     fetch("http://127.0.0.1:8000/post",{
    //         method:'POST',
    //         headers:{
    //             "Content-type": "application/json"
    //         },
    //         body: fetchAllContent
    //     })
        
    // }

    return(
        <div >
            <form action="/post" method="post"  >
                <input className='btn btn-primary my_btnCtr' type="submit"  value={title} />
                <input type="hidden" name="dataAPI" value={ (fetchAllContent != null) ? fetchAllContent : {} } />
            </form>
        </div>
    )
}

const FormComponent = () =>{

    useEffect( () =>{

    })



    return(
        <section>
            <div className='mainContainerBtn '>
                {
                    propertyComponents.map( (e) =>{
        
                        return(
                            <div  className='dinamicItem' 
                                  key={e.id} 
                            >
                                <DinamicComponent {...e} />
                            </div>
                        )

                    })
                }
            </div>

            <div className='boxResetDB'>
                <form action="/resetDB" method="post" className='form-group'>
                    <input type="submit" value="reset the database" className='btn btn-danger form-control w-100'  />
                </form>
            </div>

        </section>
    )
}

const ButtonComponent = ({title, url, styleAtt}) =>{


    useEffect( () =>{

    },[])
    

    return(
        <div >
            {/* button component */}
            <FormComponent/>
        </div>
    )


}


export default  ButtonComponent;