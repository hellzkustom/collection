                <h4 id="distance" name="distance">0km</h4>
                <div>
                    <select class="form_control" name="select" id="select">
                         <option value="0" selected>コースを選んでください</option>
                        @foreach($items as $items)
                            <option value="{{$items['name']}}">{{$items['name']}}</option>
                        @endforeach
                    </select>
                    <button id="set" class="btn btn-primary">読み込み</button>
                    <br>
                    <br>
                    <button id="now" class="btn btn-primary">現在地表示</button>
                    <button id="move" class="btn btn-primary">現在地移動</button>
                </div>
                <br>
                    <div id="map" style="width:100%; height:400px"></div>
                        <script async defer
                            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBPNWoqDLWtgxPLgVsB-K9eMadJYUn0H9U&callback=initMap">
                        </script>
                    <br>