import axios from 'axios';

const baseUrl = `${process.env.REACT_APP_BASEURL}/news`;

export const newsService = {

    getNews: () => (
        axios.get(baseUrl).then((response) => response.data)
    ),

    getOneNews: (id) => (
        axios.get(`${baseUrl}/${id}`).then((response) => response.data)
    ),
};