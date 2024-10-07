const posts = [
    {id: 1, title: '1', content: '제목1', createdAt: '2024-01-01'},
    {id: 2, title: '2', content: '제목2', createdAt: '2024-01-02'},
    {id: 3, title: '3', content: '제목3', createdAt: '2024-01-03'},
    {id: 4, title: '4', content: '제목4', createdAt: '2024-01-04'},
    {id: 5, title: '5', content: '제목5', createdAt: '2024-01-05'},
];

export function getPosts() {
    return posts;
}

export function getPostById(id) {
    return posts.find(post => post.id === id);
}