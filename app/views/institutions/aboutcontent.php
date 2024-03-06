<?php




?>

<style>
    * {
        box-sizing: border-box;
    }
    #content main .table-data {
        display: flex;
        flex-wrap: wrap;
        grid-gap: 24px;
        margin-top: 24px;
        width: 100%;
        color: var(--dark);
    }
    #content main .table-data > div {
        border-radius: 20px;
        background: var(--light);
        padding: 24px;
        overflow-x: auto;
    }
    #content main .table-data .head {
        display: flex;
        align-items: center;
        grid-gap: 16px;
        margin-bottom: 24px;
    }
    #content main .table-data .head h3 {
        margin-right: auto;
        font-size: 24px;
        font-weight: 600;
    }
    #content main .table-data .head .bx {
        cursor: pointer;
    }

    #content main .table-data .order {
        flex-grow: 1;
        flex-basis: 500px;
    }
    #content main .table-data .order table {
        width: 100%;
        border-collapse: collapse;
    }
    #content main .table-data .order table th {
        padding-bottom: 12px;
        font-size: 13px;
        text-align: left;
        border-bottom: 1px solid var(--grey);
    }
    #content main .table-data .order table td {
        padding: 16px 0;
    }
    #content main .table-data .order table tr td:first-child {
        display: flex;
        align-items: center;
        grid-gap: 12px;
        padding-left: 6px;
    }
    #content main .table-data .order table td img {
        width: 36px;
        height: 36px;
        border-radius: 50%;
        object-fit: cover;
    }
    #content main .table-data .order table tbody tr:hover {
        background: var(--grey);
    }
    #content main .table-data .order table tr td .status {
        font-size: 10px;
        padding: 6px 16px;
        color: var(--light);
        border-radius: 20px;
        font-weight: 700;
    }
    #content main .table-data .order table tr td .status.completed {
        background: var(--blue);
    }
    #content main .table-data .order table tr td .status.process {
        background: var(--yellow);
    }
    #content main .table-data .order table tr td .status.pending {
        background: var(--orange);
    }


    #content main .table-data .todo {
        flex-grow: 1;
        flex-basis: 300px;
    }
    #content main .table-data .todo .todo-list {
        width: 100%;
    }
    #content main .table-data .todo .todo-list li {
        width: 100%;
        margin-bottom: 16px;
        background: var(--grey);
        border-radius: 10px;
        padding: 14px 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    #content main .table-data .todo .todo-list li .bx {
        cursor: pointer;
    }
    #content main .table-data .todo .todo-list li.completed {
        border-left: 10px solid var(--blue);
    }
    #content main .table-data .todo .todo-list li.not-completed {
        border-left: 10px solid var(--orange);
    }
    #content main .table-data .todo .todo-list li:last-child {
        margin-bottom: 0;
    }
    /* MAIN */
    /* CONTENT */
    #content main .quality-container {
        display: flex;
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    #content main .overall-quality-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        margin: 0;
        padding: 0;
        /*align-items: center;*/
        /*justify-content: center;*/
    }
    #content main .overall-quality {
        margin: 0;
        padding: 0;
        font-size: 4rem;
        align-items: center;
        justify-content: center;
    }
    #content main .overall-quality-container h6 {
        /*margin-top: 0.1rem; !* Reduced margin-top to bring h6 closer to h1 *!*/
        padding: 0;
        /*font-size: 1rem; !* Adjust font-size as needed *!*/
    }


</style>





<main>

    <div class = "name">
        <h1>
            Costco
        </h1>

    </div>

    <div class = "quality-container">
        <div class = "overall-quality-container">
            <h1 class = "overall-quality">3.5</h1>
            <h6>Overall Quality</h6>
        </div>
    </div>



    <div class="table-data">
        <div class="order">
            <div class="head">
                <h3>Receptionists</h3>
                <i class='bx bx-search' ></i>
                <i class='bx bx-filter' ></i>
            </div>
            <table>
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Date Work</th>
                    <th>Reviews</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>
                        <img src="img/people.png">
                        <p>John Doe</p>
                    </td>
                    <td>01-10-2021</td>
                    <td><span class="status completed">Completed</span></td>
                </tr>
                <tr>
                    <td>
                        <img src="img/people.png">
                        <p>John Doe</p>
                    </td>
                    <td>01-10-2021</td>
                    <td><span class="status pending">Pending</span></td>
                </tr>
                <tr>
                    <td>
                        <img src="img/people.png">
                        <p>John Doe</p>
                    </td>
                    <td>01-10-2021</td>
                    <td><span class="status process">Process</span></td>
                </tr>
                <tr>
                    <td>
                        <img src="img/people.png">
                        <p>John Doe</p>
                    </td>
                    <td>01-10-2021</td>
                    <td><span class="status pending">Pending</span></td>
                </tr>
                <tr>
                    <td>
                        <img src="img/people.png">
                        <p>John Doe</p>
                    </td>
                    <td>01-10-2021</td>
                    <td><span class="status completed">Completed</span></td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="todo">
            <div class="head">
                <h3>Todos</h3>
                <i class='bx bx-plus' ></i>
                <i class='bx bx-filter' ></i>
            </div>
            <ul class="todo-list">
                <li class="completed">
                    <p>Todo List</p>
                    <i class='bx bx-dots-vertical-rounded' ></i>
                </li>
                <li class="completed">
                    <p>Todo List</p>
                    <i class='bx bx-dots-vertical-rounded' ></i>
                </li>
                <li class="not-completed">
                    <p>Todo List</p>
                    <i class='bx bx-dots-vertical-rounded' ></i>
                </li>
                <li class="completed">
                    <p>Todo List</p>
                    <i class='bx bx-dots-vertical-rounded' ></i>
                </li>
                <li class="not-completed">
                    <p>Todo List</p>
                    <i class='bx bx-dots-vertical-rounded' ></i>
                </li>
            </ul>
        </div>
    </div>








</main>
</section>