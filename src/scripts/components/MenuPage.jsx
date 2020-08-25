import React from 'react';
import { makeStyles } from '@material-ui/core/styles';
import Table from '@material-ui/core/Table';
import TableBody from '@material-ui/core/TableBody';
import TableCell from '@material-ui/core/TableCell';
import TableContainer from '@material-ui/core/TableContainer';
import TableHead from '@material-ui/core/TableHead';
import TableRow from '@material-ui/core/TableRow';
import Paper from '@material-ui/core/Paper';

const useStyles = makeStyles({
    container: {
        maxWidth: 1000,
    },
    table: {
    },
});

const MenuPage = ()=>{

    const classes = useStyles();

    const data = [
        {
            slug: "YouTube",
            url: "https://rss.app/youtube"
        },
        {
            slug: "Instagram",
            url: "https://rss.app/instagram"
        },
        {
            slug: "Facebook",
            url: "https://rss.app/facebook"
        }
    ]

    return (
        <TableContainer component={Paper} className={classes.container}>
            <Table className={classes.table} aria-label="simple table">
                <TableHead>
                    <TableRow>
                        <TableCell>Name</TableCell>
                        <TableCell align="right">URL</TableCell>
                        <TableCell align="right">Actions</TableCell>
                    </TableRow>
                </TableHead>
                <TableBody>
                    {data.map((row) => (
                        <TableRow key={row.slug}>
                            <TableCell component="th" scope="row">
                                {row.slug}
                            </TableCell>
                            <TableCell align="right">{row.url}</TableCell>
                            <TableCell align="right">Löschen</TableCell>
                        </TableRow>
                    ))}
                </TableBody>
            </Table>
        </TableContainer>
    )
}

export default MenuPage;