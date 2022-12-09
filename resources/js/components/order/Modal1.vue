<template>
  <div
    class="modal fade show modal-overlay "
    id="modal-lg"
    aria-modal="true"
    role="dialog"
    style="padding-right: 17px; display: block"
    v-if="showModal"
  >
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <span class="modal-title"> Dear : {{ successData.client.name }} , Your Order is Created Successfully, Thank You!</span>
          <button
            type="button"
            class="close"
            data-dismiss="modal"
            aria-label="Close"
            @click="showModal = false"
          >
            <span aria-hidden="true" >×</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <div
                class="mb-5 d-flex align-items-center justify-content-between"
              >
                <span
                  >Order No :
                  <a href="#" class="trackno"
                    >#{{ successData.data.order_id }}</a
                  ></span
                >
              </div>

              <div class="d-flex justify-content-around lh-condensed">
                <div class="order-details text-center">
                  <div class="order-title">Name</div>
                  <div class="order-info">
                    {{ successData.client.name }}
                  </div>
                </div>
                <div class="order-details text-center">
                  <div class="order-title">Total Amound</div>
                  <div class="order-info text-capitalize">Rs {{successData.data.amount}}</div>
                </div>
                <div class="order-details text-center">
                  <div class="order-title">Track no</div>
                  <div class="order-info text-capitalize">{{successData.data.track_no}}</div>
                </div>
              </div>
            </div>
        </div>
          <!-- end order detail table -->
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">My Others</div>
                <div class="card-body">
                  <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Code</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr
                        v-for="(data, index) in successData.order_list"
                        :key="index"
                      >
                        <th scope="row">{{ index + 1 }}</th>
                        <td>{{ data.product_info.name }}</td>
                        <td>{{ data.product_info.code }}</td>
                        <td>{{ data.product_info.price }}</td>
                        <td>{{ data.quantity }}</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
            </div>
            </div>
          </div>
        </div>
      </div>

        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" @click="showModal = false">
            Close
          </button>
          <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
    name: "modal1",
    props: ["showModal", "successData"],
   
   
};
</script>

<style>
.samebg .card-body {
    padding: 1rem 1rem;
}
.card {
    background: #fff;
    box-shadow: 0 1px 6px 1px rgb(69 65 78 / 10%);
    margin-bottom: 30px;
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: var(--cui-card-bg,#fff);
    background-clip: border-box;
    border: 1px solid var(--cui-card-border-color,rgba(0,0,21,.125));
    border-radius: 0.25rem;
}
.card-body {
    flex: 1 1 auto;
    padding: 1rem 1rem;
    color: var(--cui-card-color,unset);
}
.trackno {
    color: #ff470d;
}
.order-title{
    font-weight: 700;
    padding: 10px 0;
}
.text-capitalize {
    text-transform: capitalize!important;
}
.card-header {
    padding: 0.5rem 1rem;
    margin-bottom: 0;
    color: var(--cui-card-cap-color,unset);
    background-color: var(--cui-card-cap-bg,rgba(0,0,21,.03));
    border-bottom: 1px solid var(--cui-card-border-color,rgba(0,0,21,.125));
}
.card-header:first-child {
    border-radius: calc(0.25rem - 1px) calc(0.25rem - 1px) 0 0;
}
.modal-open .modal {
    overflow-x: hidden;
    overflow-y: auto;
}
.modal {
    position: fixed;
    top: 0;
    left: 0;
    z-index: 1050;
    display: none;
    width: 100%;
    height: 100%;
    overflow: hidden;
    outline: 0;
    box-shadow: 0 5px 5px rgba(0, 0, 0, 0.2);
}
.modal-overlay {
  content: "";
  position: absolute;
  position: fixed;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  background: #2c3e508f;
  opacity: 0.6;
  cursor: pointer;
}
.fade {
    transition: opacity .15s linear;
}
</style>