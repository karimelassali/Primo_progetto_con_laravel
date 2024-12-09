<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Show</title>
    @vite('resources/css/app.css')
</head>
<body>
    <x-nav-bar />
    <h1 class="mt-44" >You have : {{$missions->count()}} missions</h1>
    <div class="w-full border p-2 gap-3 h-full flex justify-around " >
        <h1>My Missions !</h1>
        <h1>Finished Missions !</h1>
    </div>
    @if ($missions->count() > 0)
    <div class="flex w-full z-20 p-1" >
        
        <div class="w-full border min-h-20 p-2 gap-3 h-full grid grid-cols-3 " >
            <!-- loop through all the missions that the user has -->
            @foreach ($missions as $mission)
            <!-- if the mission is not finished -->
            @if ($mission->finished != 1)
            <div class=" border-2 shadow rounded  min-h-28  p-1 mt-2" >
                <!-- display the mission info -->
                <center>
                    <h1 class="text-2xl font-bold">{{ $mission->title }}</h1>
                    <p>{{ $mission->preority }}</p>
                    <p>{{ $mission->created_at }}</p>
                </center>
                <!-- display the buttons to complete and delete the mission -->
                <div class="w-full sticky flex justify-around bg-slate-100 rounded p-3 gap-3 mt-2" >
                    <!-- complete mission button -->
                    <button onclick="completeMission({{ $mission->id }})"   class="p-2 btn       m-1      bg-green-500 w-[40%] rounded text-white "  >Done</button>
                    <!-- delete mission button -->
                    <button onclick="deleteMission({{ $mission->id }})" class="Delete       p-2 m-1  bg-pink-500 w-[40%] rounded text-white "  >Delete</button>
                </div>
            </div>
            @endif
               
            @endforeach
        </div>

        <div class="w-full border-l border-red-600 border min-h-20 p-2 gap-3 h-full grid grid-cols-3" >
            <!-- loop through all the missions that the user has and if finished is 1 then  -->
            <!-- display the finished missions in the finished section -->
            @foreach ($missions as $mission )
            @if ($mission->finished == 1)
            <!-- display the mission info -->
            <div class=" border-2 shadow rounded  min-h-28  p-1 mt-2" >
                <center>
                    <h1 class="text-2xl font-bold">{{ $mission->title }}</h1>
                    <p>{{ $mission->preority }}</p>
                    <p>{{ $mission->created_at }}</p>
                </center>
                <!-- display the delete mission button in the finished section -->
                <div class="w-full sticky flex justify-around bg-slate-100 rounded p-3 gap-3 mt-2" >
                    <button onclick="deleteMission({{ $mission->id }})" class="Delete       p-2 m-1  bg-pink-500 w-[40%] rounded text-white "  >Delete</button>
                </div>
            </div>
            @endif
            @endforeach
        </div>
    </div>
        
    @endif
    

    <script>
        
        /**
         * Deletes a mission by sending a DELETE request to the server.
         *
         * @param {number} id - The ID of the mission to be deleted.
         */
        const deleteMission = async (id) => {
            try {
                // Send a DELETE request to remove the mission
                const request = await fetch('http://127.0.0.1:8000/api/missions/', {
                    method: 'DELETE',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({ id })
                });

                // Reload the page if the mission is successfully deleted
                if (request.status === 201) {
                    window.location.reload();
                }
            } catch (error) {
                // Alert the user in case of an error
                alert(error);
            }
        }



        /**
         * Marks a mission as complete by sending a PATCH request to the server.
         *
         * @param {number} id - The ID of the mission to be marked as complete.
         */
        const completeMission = async (id) => {
            try {
                // Send a PATCH request to update the mission status
                const req = await fetch('http://127.0.0.1:8000/api/missions/', {
                    method: 'PATCH',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({ id })
                });

                // Reload the page if the request is successful
                if (req.status === 201) {
                    window.location.reload();
                }
            } catch (error) {
                // Alert the user in case of an error
                alert(error);
            }
        }
    </script>

</body>
</html>