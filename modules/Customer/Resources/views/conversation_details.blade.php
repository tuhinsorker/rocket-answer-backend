<x-app-layout>

        <link href="{{ nanopkg_asset('js/emojionearea/dist/emojionearea.min.css') }}" rel="stylesheet">
        <link href="{{ nanopkg_asset('css/messenger/messenger.css') }}" rel="stylesheet">
        

        <style>

            .messenger-dialog__area {
                -ms-flex: 0 0 100%;
                flex: 0 0 100%;
                max-width: 100%;
            }
            .message-content {
                height: calc(100vh - 160px);
                border-radius: 10px;
                background-image: url({{nanopkg_asset('image/messenger-bg.png')}});
            }

        </style>

        <div class="row justify-content-center pt-4">
            <div class="col-lg-6">
              <div class="card">
                <div class="messenger-dialog__area p-0">
                  <div class="conversation-search">
                    <div class="d-flex">
                      <div class="btn-group" role="group" aria-label="Basic example">
                        <button type="button" class="btn"><i class="ti-angle-up"></i></button>
                        <button type="button" class="btn"><i class="ti-angle-down"></i></button>
                      </div>
                      <div class="input-group">
                        <i class="ti-search search__icon"></i>
                        <input type="text" class="form-control" placeholder="Find messages in current conversation" aria-label="Find messages in current conversation" aria-describedby="button-addon1" />
                        <div class="input-group-append">
                          <button class="btn btn-outline-secondary close-search" type="button" id="button-addon1">Cancel</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!--/.conversation search-->
                  <div class="message-content message-content-scroll bg-text-green ps">
                    <div class="position-relative">
                      <div class="date">
                        <hr />
                        <span>{{ $conversation->date?date('d-M-Y', strtotime($conversation->date)):'Conversation Details'}}</span>
                        <hr />
                      </div>

                      @foreach ($items as $item)

                       
                        @if ($item->is_sender == 2)
                          <div class="message me">
                              <div class="text-main">
                              <span class="time-ago">{{date('H:i:s A', strtotime($item->created_at));}}</span>
                              <div class="text-group me">
                                  <div class="text me">
                                  <p>{{$item->message}}</p>
                                  </div>
                              </div>
                              </div>
                          </div>
                          <!--/.message-->
                        @endif

                        @if ($item->is_sender == 1)
                        <div class="message">

                            @php  
                                $image_src = $item?->customer_sender_data?->image?Url('/storage/'.$item->customer_sender_data->image):nanopkg_asset('image/default.jpg');
                            @endphp

                            <img class="avatar" src="{{$image_src}}" data-bs-toggle="tooltip" data-placement="top" title="" alt="avatar" data-original-title="Keith" />
                            <div class="text-main">
                            <span class="time-ago">{{date('H:i:s A', strtotime($item->created_at));}}</span>
                            <div class="text-group">
                                <div class="text">
                                <p>{{$item->message}}</p>
                                </div>
                            </div>
                            </div>
                        </div>
                        <!--/.message-->
                      @endif

                      @endforeach
                    </div>
                    
                    <div class="ps__rail-x" style="left: 0px; top: 0px"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px"></div></div>
                    <div class="ps__rail-y" style="top: 0px; right: 0px"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px"></div></div>
                  </div>
                  <!--/.tab content-->
                </div>
              </div>
            </div>
          </div>

</x-app-layout>

@stack('lib-scripts')
<script src="{{ nanopkg_asset('js/perfect-scrollbar/dist/perfect-scrollbar.min.js') }}"></script>
<script src="{{ nanopkg_asset('js/emojionearea/dist/emojionearea.min.js') }}"></script>
<script src="{{ nanopkg_asset('js/messenger/messenger.active.js') }}"></script>
@stack('js')