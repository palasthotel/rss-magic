import React, {useEffect, useState} from 'react';
import { makeStyles } from '@material-ui/core/styles';

const useStyles = makeStyles({
    table: {
        width: 1000,
        "& button":{
            textAlign: "center",
            width:"100%",
        }
    },
    thSlug:{
        width: 200,
    },
    thActions: {
        width: 100,

    },
    input:{
        width: "100%",
    },
    delete:{
        borderColor: "#D32F2F !important",
        color: "#D32F2F !important",
    },
    add:{
    }
});

const RegularRow = ({row, classes})=> {

    const [url, setUrl] = useState(row.url)
    const [trashed, setTrashed] = useState(false)

    const trashedPrefix = (trashed)? "trashed-": "";

    return (
        <tr key={row.slug}>
            <td>
                <input
                    name={`${trashedPrefix}rss-magic-slug[]`}
                    type="text"
                    readOnly={true}
                    disabled={trashed}
                    value={row.slug}
                    className={`regular-text ${classes.input}`}
                />
            </td>
            <td>
                <input
                    name={`${trashedPrefix}rss-magic-url[]`}
                    type="text"
                    className={`regular-text ${classes.input}`}
                    value={url}
                    onChange={(e)=>setUrl(e.target.value)}
                    disabled={trashed}
                />
            </td>
            <td>
                {!trashed?
                    <button
                        className={`button ${classes.delete}`}
                        onClick={(e)=>{
                            e.preventDefault()
                            setTrashed(true)
                        }}
                    >
                        Trash
                    </button>
                    :
                    <button
                        className={`button ${classes.untrash}`}
                        onClick={(e)=>{
                            e.preventDefault()
                            setTrashed(false)
                        }}
                    >
                        Untrash
                    </button>
                }

            </td>
        </tr>
    )
}

const MenuPage = ({feeds})=>{

    const classes = useStyles()

    const [newData, setNewData] = useState([])
    const [addData, setAddData] = useState({slug:"",url:""})
    const [isAddValid, setIsAddValid] = useState(false)

    useEffect(()=>{
        if(
            feeds.find(({slug})=>slug === addData.slug)
            ||
            newData.find(({slug})=>slug === addData.slug)
        ){
            setIsAddValid(false)
        } else if(
            feeds.find(({url})=> url === addData.url)
            ||
            newData.find(({url})=> url === addData.url)
        ){
            setIsAddValid(false)
        } else {
            setIsAddValid(true)
        }
    }, [addData.slug, addData.url])


    const addNewData = () => {
        if(addData.slug.length === 0) return;
        if(addData.url.length === 0) return;
        if(!isAddValid) return;

        setNewData([
            ...newData,
            {
                ...addData
            }
        ])
        setAddData({slug:"", url:""})
    }

    return (
        <table className={"wp-list-table widefat fixed striped posts "+classes.table}>
            <thead>
                <tr>
                    <th className={classes.thSlug}>Slug</th>
                    <th>Url</th>
                    <th className={classes.thActions}>Action</th>
                </tr>
            </thead>
            <tbody>
                {feeds.map(row=><RegularRow
                    key={row.slug}
                    row={row}
                    classes={classes}
                />)}
                {newData.map(row=><RegularRow
                    key={row.slug}
                    row={row}
                    classes={classes}
                />)}
                <tr>
                    <td>
                        <input
                            type="text"
                            name="rss-magic-slug[]"
                            className={`regular-text ${classes.input}`}
                            value={addData.slug}
                            onChange={(e)=>{
                                setAddData({
                                    ...addData,
                                    slug: e.target.value.replace(/[^a-zA-Z0-9\-]/gi,'_')
                                });
                            }}
                        />
                    </td>
                    <td>
                        <input
                            type="text"
                            name="rss-magic-url[]"
                            className={`regular-text ${classes.input}`}
                            value={addData.url}
                            onChange={(e)=>{
                                setAddData({
                                    ...addData,
                                    url: e.target.value.replace(/[^a-zA-Z0-9\-=:/\.\?\&]/gi,'_'),
                                });
                            }}
                        />
                    </td>
                    <td>
                        <button
                            className={`button button-primary ${classes.add}`}
                            disabled={addData.url.length < 1 || addData.url.length < 1 || !isAddValid}
                            onClick={addNewData}
                        >
                            Add
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    )
}

export default MenuPage;