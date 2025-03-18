const tasks = [];
const search = "";
const searchDate = "";
const searchStatus = "";

function filterTask() {
    tasks = tasks
        .filter((task) => task.name.includes(search))
        .filter((task) => task.date.includes(searchDate))
        .filter((task) => task.status.includes(searchStatus));
}
