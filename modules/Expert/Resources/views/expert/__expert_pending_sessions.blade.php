<x-app-layout>
    <div class="row mb-4">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <h6 class="fs-17 fw-semi-bold mb-0">Pending Session</h6>
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table id="pending-sessions" class="table display table-bordered table-striped table-hover">
                  <thead>
                    <tr>
                      <th>Code</th>
                      <th>Expert Category</th>
                      <th>Customer Name</th>
                      <th>Subject</th>
                      <th>Date</th>
                      {{-- <th>Time</th> --}}
                    </tr>
                  </thead>
                  <tbody>

                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>

@push('js')


<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/4.0.1/socket.io.js"></script>

<script>
    const socket = io("{{ env('SOCKET_URL') }}",{
        query: {
            type: "admin",
        }
    });

    const options = {
        year: "numeric",
        month: "long",
        day: "numeric"
    };

    // Listen for connection events
    socket.on("connect", () => {

        console.log("Connected to server");
    });

    // Listen for custom events from the server
    socket.on("expert_all_pending_sessions", (data) => {
        console.log("Received customEvent:", data);

        const tableBody = document.querySelector("#pending-sessions tbody");

        tableBody.innerHTML = "";

        // Loop through the response and create new rows
        data.forEach(item => {
        const row = tableBody.insertRow();
        const date = new Date(item.date);
        const human_readable = date.toLocaleDateString("en-US", options);

        row.innerHTML = `
            <td>${item.code}</td>
            <td>${item.category_name}</td>
            <td>${item.c_name}</td>
            <td>${item.subject}</td>
            <td>${human_readable}</td>
        `;
        });






    });

    // Emit data to the server
    // socket.emit("clientEvent", { message: "Hello, server!" });

</script>



@endpush



</x-app-layout>
