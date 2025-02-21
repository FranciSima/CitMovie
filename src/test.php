public function testSeatAvailability() {
    $seat = new Seat();
    $this->assertFalse($seat->isAvailable(10));
}
testSeatAvailability();