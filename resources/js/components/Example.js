import React from 'react';
import ReactDOM from 'react-dom';

function Example() {
    return (
        <div className="container">
            <div className="row justify-content-center">
                <div className="col-md-8">
                    <div className="card">
                        <div className="card-header">Example Component</div>

                        <div className="card-body">I'm an example component!</div>
                    </div>
                </div>
            </div>
        </div>
    );
}

export default Example;

if (document.getElementById('app')) {
    ReactDOM.render(<Example />, document.getElementById('app'));
}


import React, { createElement, useState, useEffect } from 'react';
import { Upload, message } from 'antd';
import { InboxOutlined } from '@ant-design/icons';
import Axios from 'axios';

const { Dragger } = Upload;



function Documents() {

  const props = {
    name: 'file',
    multiple: true,
    action: 'http://127.0.0.1:8000/api/upload_file',
    onChange(info) {
      const { status } = info.file;
      if (status !== 'uploading') {
        console.log(info.file, info.fileList);
      }
      if (status === 'done') {
        message.success(`${info.file.name} file uploaded successfully.`);
        getData();
      } else if (status === 'error') {
        message.error(`${info.file.name} file upload failed.`);
      }
    },
    defaultFileList: [],
  };
  
  const [documentsList, setDocumentsList] = useState([]);
  const [isdocs, setIsDocs] = useState(false);
  

  useEffect(() => {
    getData();
  }, []);

  const getData = async () => {

   // console.log(localStorage.getItem('user'));
    const userobj = localStorage.getItem('user');
    const user_id = JSON.parse(userobj).id;
   // console.log(user_id);
    
    let data = []; 

    const data_pass = {
      'user_id' : user_id,
    };
    const token = localStorage.getItem('token');
    const res = Axios.post(
      "http://localhost:8000/api/documents",data_pass, {
        headers: {
          'Authorization': `Bearer ${token}`
        },
      })
      .then(function(response)  {
        console.log(response.data);
        console.log(props.defaultFileList);
        //setDocuments(response.data.data);
        setDocumentsList([...response.data.data]);
        props.defaultFileList = [...response.data.data]
      //  data[0] = response.data.data;
        if(response.data.data != undefined){
          setIsDocs(true);
        }  
        else  {
          setIsDocs(false);
        }  
      })
      .catch(error => {
        alert("catch "+error);
      });
  }
   
  function handleClick() {
    console.log("sad");
    console.log(documentsList);
    console.log(JSON.stringify(documentsList));
    
   

    console.log("sdsadsa");
    
  }

  return (
    <div>
      <Dragger {...props}>
        <p className="ant-upload-drag-icon">
          <InboxOutlined />
        </p>
        <p className="ant-upload-text">Click or drag file to this area to upload</p>
        <p className="ant-upload-hint">
          Support for a single or bulk upload. Strictly prohibit from uploading company data or other
          band files
        </p>
      </Dragger>

      <div >
            <h3>Documents</h3>
            {documentsList.length > 0 && (
              <ol>
                {documentsList.map((item, index) => (
                  <li key={index}>{item.document_name}</li>
                ))}
              </ol>
            )}
      </div>      
    </div>  
  )  
}


export default Documents;
