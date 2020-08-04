<template>
    <transition name="fade">
        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i> Calendario
                        <button
                            type="button"
                            class="btn btn-primary"
                            @click="toggleModal()"
                        >
                            <span class="fa fa-plus"></span>
                            Agendar Cita
                        </button>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <FullCalendar :options="calendarOptions" />
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.container-fluid -->
            <!-- Button trigger modal -->
            <!-- Modal -->
            <div
                class="modal fade"
                id="modelId"
                tabindex="-1"
                role="dialog"
                aria-labelledby="modelTitleId"
                aria-hidden="true"
            >
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Agendar una Cita</h5>
                            <button
                                type="button"
                                class="close"
                                data-dismiss="modal"
                                aria-label="Close"
                            >
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="">Titulo</label>
                                <input
                                    type="text"
                                    v-model="newEvent.event_name"
                                    name=""
                                    id=""
                                    class="form-control"
                                    placeholder=""
                                    aria-describedby="helpId"
                                />
                            </div>
                            <div class="form-group">
                                <label for="">Doctor</label>
                                <select class="form-control" v-model="newEvent.idDoctor">
                                    <option value="" disabled selected
                                        >Selecciona un Doctor</option
                                    >
                                    <option
                                        v-for="ele in doctores"
                                        :value="ele.id"
                                        >{{ ele.nombre_usuario }}</option
                                    >
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Fecha de inicio</label>
                                <input
                                    type="date"
                                    v-model="newEvent.start_date"
                                    name=""
                                    id=""
                                    class="form-control"
                                    placeholder=""
                                    aria-describedby="helpId"
                                />
                            </div>
                            <div class="form-group">
                                <label for="">Hora de inicio</label>
                                <input
                                    type="time"
                                    v-model="newEvent.start_time"
                                    name=""
                                    id=""
                                    class="form-control"
                                    placeholder=""
                                    aria-describedby="helpId"
                                />
                            </div>
                            <div class="form-group">
                                <label for="">Fecha final</label>
                                <input
                                    type="date"
                                    v-model="newEvent.end_date"
                                    name=""
                                    id=""
                                    class="form-control"
                                    placeholder=""
                                    aria-describedby="helpId"
                                />
                            </div>
                            <div class="form-group">
                                <label for="">Hora de final</label>
                                <input
                                    type="time"
                                    v-model="newEvent.end_time"
                                    name=""
                                    id=""
                                    class="form-control"
                                    placeholder=""
                                    aria-describedby="helpId"
                                />
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button
                                type="button"
                                class="btn btn-secondary"
                                data-dismiss="modal"
                            >
                                Cerrar
                            </button>
                            <button
                                type="button"
                                @click="addNewEvent()"
                                class="btn btn-primary"
                            >
                                Guardar
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </transition>
</template>

<script>
import FullCalendar from "@fullcalendar/vue";
import dayGridPlugin from "@fullcalendar/daygrid";
import interactionPlugin from "@fullcalendar/interaction";
import "fullcalendar/dist/locale/es";
import $ from 'jquery';

export default {
    components: {
        FullCalendar // make the <FullCalendar> tag available
    },
    data() {
        return {
            calendarOptions: {
                plugins: [dayGridPlugin, interactionPlugin],
                initialView: "dayGridMonth",
                dateClick: this.handleDateClick,
                events: [
                    // { title: "event 1", start: "2020-07-01 12:30:00", end: '2020-07-01 21:30:00' },
                    // { title: "event 2", start: "2020-07-02 12:30:00", end: '2020-07-02 21:30:00' }
                ],
                locale: "es"
            },
            newEvent: {
                event_name: "",
                start_date: "",
                end_date: "",
                start_time: "",
                end_time: "",
                idDoctor:""//<-- el seleccionado estará aquí
            },
            doctores: [] // <-- La lista de doctores
        };
    },
    created() {
        this.getEvents();
        this.getDoctores();
        console.log("created");
    },
    methods: {
        addNewEvent() {
            axios
                .post("/agenda/store", {
                    ...this.newEvent
                })
                .then(data => {
                    this.getEvents(); // update our list of events
                    // this.resetForm(); // clear newEvent properties (e.g. title, start_date and end_date)
                    $("#modelId").modal("hide");
                })
                .catch(err =>
                    console.log("Unable to add new event!", err.response.data)
                );
        },
        getDoctores() {
            let me = this;
            axios
                .get("/doctor/index")
                .then(function(response) {
                    me.doctores = response.data;
                })
                .catch(function(error) {
                    // handle error
                    console.log(error);
                });
        },
        getEvents() {
            let me = this;
            axios
                .get("/agenda/index")
                .then(function(response) {
                    me.calendarOptions.events = response.data;
                    // console.log(response.data);
                })
                .catch(function(error) {
                    // handle error
                    console.log(error);
                });
        },
        toggleModal() {
            $("#modelId").modal("show");
        },
        handleWeekendsToggle() {
            this.calendarOptions.weekends = !this.calendarOptions.weekends; // update a property
        },
        handleDateSelect(selectInfo) {
            let title = prompt("Please enter a new title for your event");
            let calendarApi = selectInfo.view.calendar;
            calendarApi.unselect(); // clear date selection
            if (title) {
                calendarApi.addEvent({
                    id: createEventId(),
                    title,
                    start: selectInfo.startStr,
                    end: selectInfo.endStr,
                    allDay: selectInfo.allDay
                });
            }
        },
        handleEventClick(clickInfo) {
            if (
                confirm(
                    `Are you sure you want to delete the event '${clickInfo.event.title}'`
                )
            ) {
                clickInfo.event.remove();
            }
        },
        handleEvents(events) {
            this.currentEvents = events;
        },
        handleDateClick(arg) {
            alert("date click! " + arg.dateStr);
        }
    }
};
</script>
